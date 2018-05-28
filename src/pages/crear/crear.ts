import { Component } from '@angular/core';
import {AlertController, IonicPage, NavController, NavParams} from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import {MenuPage} from "../menu/menu";
/**
 * Generated class for the CrearPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()

@Component({
  selector: 'page-crear',
  templateUrl: 'crear.html',

})
export class CrearPage {
  res: any;
  myForm: FormGroup;
  constructor(public navCtrl: NavController, public navParams: NavParams,public formBuilder: FormBuilder,public http: HttpClient,private alertCtrl: AlertController) {
    this.res = navParams.data[1];
    this.myForm = this.createMyForm();
  }
  private createMyForm(){
    return this.formBuilder.group({
      Nombre: ['', Validators.required],
      Descripción: ['', Validators.required],
      total: ['', Validators.required],
      fecha: ['', Validators.required]

    });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad CrearPage');
  }
  protected adjustTextarea(event: any): void {
    let textarea: any		= event.target;
    textarea.style.overflow = 'hidden';
    textarea.style.height 	= 'auto';
    textarea.style.height 	= textarea.scrollHeight + 'px';
    return;
  }
  pickData(){
    this.http.get('http://localhost:8000/crearevento/?nombre='+this.myForm.value.Nombre +
      '&descripcion='+this.myForm.value.Descripción +
      '&fecha='+this.myForm.value.fecha +
      '&url=https://pbs.twimg.com/profile_images/638742081091993600/8UwmmUl8_400x400.jpg' +
      '&totalPrice='+this.myForm.value.total +
      '&IdAdmin='+this.res +
      '&allUSer=[2,5,2,7]')
      .subscribe(
        res => {
          console.log(res);

          if(res[0] === 'existe'){
            let alert = this.alertCtrl.create({
              title: 'Correo en uso',
              subTitle: 'Intentelo con otro',
              buttons: ['Registrar']
            });
            alert.present();
          }else if (res[0] === 'nuevo'){
            this.navCtrl.push(MenuPage,res);
          }
        },
        err => {
          console.log(err);
          let alert = this.alertCtrl.create({
            title: 'Server error',
            subTitle: 'Intentelo mas tarde',
            buttons: ['Retry']
          });
          alert.present();
        }

      );

    console.log(this.res,this.myForm.value.Nombre,this.myForm.value.Descripción,this.myForm.value.fecha);
  }
}
