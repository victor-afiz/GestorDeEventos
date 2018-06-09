import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Storage } from '@ionic/storage';

import { HttpClient } from '@angular/common/http';
import { HomePage } from '../home/home';
import { MenuPage } from '../menu/menu';
/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {
  myForm: FormGroup;
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    public formBuilder: FormBuilder,
    public http: HttpClient,
    private alertCtrl: AlertController,
    public storage: Storage
    ){
      this.myForm = this.createMyForm();
    storage.get('nombre').then((nombre) => {

      if (nombre === null){

      }else{
        storage.get('id').then((id) => {
          let res = []
          res[0] = nombre;
          res[1] = id;
          this.navCtrl.push(MenuPage, res)
        });
      }
    });

  }
  private createMyForm(){
    return this.formBuilder.group({
      email: ['', Validators.required],
      password: ['', Validators.required]

    });
  }

  find(){
      this.http.get('http://80.211.5.206/index.php/login/?email='+this.myForm.value.email+'&password='+
          this.myForm.value.password)
          .subscribe(
              res => {
                  console.log("tst",res[0]);

                  if (res[0] == 500){
                    let alert = this.alertCtrl.create({
                      title: 'Fallo al iniciar sesión',
                      subTitle: 'Contraseña o email incorecto',
                      buttons: ['Ok']
                    });
                    alert.present();
                  }
                  else if (res[0] == 501){
                    let alert = this.alertCtrl.create({
                      title: 'Fallo al iniciar sesión',
                      subTitle: 'Usuario no encontrado',
                      buttons: ['Ok']
                    });
                    alert.present();
                  }else if (res[0] && res[1]){
                    this.storage.set('nombre', res[0]);
                    this.storage.set('id', res[1]);
                    this.navCtrl.push(MenuPage, res)
                }
              },
              err => {
                  console.log("Error;",err);
              }
          );
  }
  send() {
    this.navCtrl.push(HomePage);
  }
  ionViewWillEnter()
  {
    sessionStorage.removeItem('currentUser');
  }

}
