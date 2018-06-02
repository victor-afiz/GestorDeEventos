import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { AlertController } from 'ionic-angular';
import { ImagenesPage } from '../imagenes/imagenes';

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
  all: any = [];
  text: any =[];
  myForm: FormGroup;
  Images = [
    'Playa',
    'Bar',
    'Restraurante',
    'Museo'
  ];
  imagenSeleccionada: any;

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

  ionViewDidLoad() {
    this.http.get('http://80.211.5.206/index.php/User/').subscribe(
      res => {
        if (res) {
            this.all = res;
            for (let i = 0; i<this.all.length; i++){
              if (this.all[i].id != this.navParams.data[1]){
                  this.text = this.all;
              }
            }
        }
      },
      err => {
        console.log("Error", err);
      }
    );
  }
  protected adjustTextarea(event: any): void {
    let textarea: any = event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    return;
  }
  pickData() {
    this.http.get('http://80.211.5.206/index.php/crearevento/?nombre=' + this.myForm.value.Nombre +
      '&descripcion=' + this.myForm.value.Descripción +
      '&fecha=' + this.myForm.value.fecha +
      '&url='+this.imagenSeleccionada +
      '&totalPrice=' + this.myForm.value.total +
      '&IdAdmin=' + this.res +
      '&allUSer=' + this.unique_array + " ").subscribe(
        res => {
                let alert = this.alertCtrl.create({
                    title: 'Exito',
                    subTitle: 'Se creo el evento con exito',
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

  push(id) {
    this.user.push(id);
    this.removeDuplicates(this.user);
  }

  removeDuplicates(user) {
    for (let i = 0; i < user.length; i++) {
      if (this.unique_array.indexOf(user[i]) == -1) {
        this.unique_array.push(user[i]);
      }
    }
  }
  pickImage()
  {
       this.navCtrl.push(ImagenesPage);
  }
    ionViewWillEnter()
    {
        console.log(this.navParams.get("e"));
    }
}
