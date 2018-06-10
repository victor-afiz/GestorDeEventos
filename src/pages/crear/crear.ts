import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { AlertController } from 'ionic-angular';
import { ImagenesPage } from '../imagenes/imagenes';
import { UsersPage } from '../users/users';

@IonicPage()

@Component({
  selector: 'page-crear',
  templateUrl: 'crear.html',

})
export class CrearPage {
  res: any;
  unique_array: any = [];
  user: any = [];
  a: any = [];
  text: any =[];
  myForm: FormGroup;
  imagen: any;
  imagenSeleccionada: any;
  fecha: any;
  resultado: any;

  constructor(public navCtrl: NavController, public navParams: NavParams, public formBuilder: FormBuilder, public http: HttpClient, public alertCtrl: AlertController) {
    this.res = navParams.data[1];
    this.user = [this.res];
    this.myForm = this.createMyForm();
  }
  private createMyForm() {
    return this.formBuilder.group({
      Nombre: ['', Validators.required],
      Descripción: ['', Validators.required],
      total: ['', Validators.required],
      fecha: ['', Validators.required]

    });
  }

  protected adjustTextarea(event: any): void {
    let textarea: any = event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    return;
  }
  pickData() {
    this.fecha = this.myForm.value.fecha.split('-');
    this.resultado = this.fecha[2]+"/"+this.fecha[1]+"/"+this.fecha[0];
    if (null == this.user){
      let alert = this.alertCtrl.create({
        subTitle: 'No puedes crear un evento sin usuarios',
        buttons: ['Ok']
      });
      alert.present();
    }else if (null ==this.imagenSeleccionada ){
      let alert = this.alertCtrl.create({
        subTitle: 'No puedes crear un evento sin imagen',
        buttons: ['Ok']
      });
      alert.present();
    }else{
      this.removeDuplicates(this.user);
      this.http.get('http://80.211.5.206/index.php/crearevento/?nombre=' + this.myForm.value.Nombre +
        '&descripcion=' + this.myForm.value.Descripción +
        '&fecha=' + this.resultado +
        '&url='+this.imagenSeleccionada +
        '&totalPrice=' + this.myForm.value.total +
        '&IdAdmin=' + this.res +
        '&allUSer=' + this.unique_array + " ").subscribe(
          res => {
                  let alert = this.alertCtrl.create({
                      subTitle: 'Se creó el evento con éxito',
                      buttons: ['OK']
                  });
                  alert.present();
                  this.myForm.patchValue({Nombre: ""});
                  this.myForm.patchValue({Descripción: ""});
                  this.myForm.patchValue({fecha: ""});
                  this.myForm.patchValue({total: ""});

                  this.user = [];
                  this.unique_array = [];
                  this.imagenSeleccionada = "";

          },
          err => {
            console.log(err);
          }

        );
    }

  }


  removeDuplicates(user) {
    for (let i = 0; i < user.length; i++) {
      if (this.unique_array.indexOf(user[i]) == -1) {
        this.unique_array.push(user[i]);
      }
    }
    console.log(this.unique_array);
  }
  pickImage()
  {
    this.navCtrl.push(ImagenesPage);
  }

  pickUsers()
  {
    console.log(this.res);
    this.navCtrl.push(UsersPage, this.res);
  }

  ionViewWillEnter()
  {
    this.user = this.navParams.get('array')|| null;
    this.imagenSeleccionada = this.navParams.get('ruta')|| null;
  }
}
