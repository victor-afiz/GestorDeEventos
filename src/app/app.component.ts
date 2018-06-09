import { Component,ViewChild } from '@angular/core';
import { Platform, NavParams } from 'ionic-angular';
import { NavController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { MenuController } from 'ionic-angular';
import { AlertController } from 'ionic-angular';
import { Storage } from '@ionic/storage';

import { PrivacyPolicyPage } from '../pages/privacy-policy/privacy-policy';
import { VersionPage } from '../pages/version/version';
import { AboutPage } from '../pages/about/about';
import { MenuPage } from '../pages/menu/menu';
import { LoginPage } from '../pages/login/login';
import { HttpClient } from '@angular/common/http';



@Component({
  templateUrl: 'app.html'

})
export class MyApp {
  @ViewChild('mycontent') nav: NavController

  rootPage:any = LoginPage;

  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen, public menuCtrl: MenuController,  public storage: Storage,public alertCtrl: AlertController, public http: HttpClient) {
    platform.ready().then(() => {
      // Okay, so the platform is ready and our plugins are available.
      // Here you can do any higher level native things you might need.
      statusBar.styleDefault();
      splashScreen.hide();
    });
  }
  about(){
    this.nav.push(AboutPage);
    this.menuCtrl.close();
  }

  policy(){
    this.nav.push(PrivacyPolicyPage);
    this.menuCtrl.close();
  }

  version(){
    this.nav.push(VersionPage);
    this.menuCtrl.close();
  }

  delete()
  {
    let alert = this.alertCtrl.create({
      title: 'Eliminar Cuenta',
      message: '¿Seguro que quieres eliminar tu cuenta de usuario?',
      buttons: [
        {
          text: 'No',
          role: 'No',
          handler: () => {
          }
        },
        {
          text: 'Si',
          handler: () => {
            let session = sessionStorage.getItem('currentUser');
              this.http.get('http://80.211.5.206/index.php/deleteUser/?id='+session+'')
              .subscribe(
                  res => {
                    this.menuCtrl.close();
                    this.nav.push(LoginPage);
                  },
                  err => {
                      console.log("Error",err);
                  }
              );
          }
        }
      ]
    });
    alert.present();
  }

  exit(){
    let alert = this.alertCtrl.create({
      title: 'Salir',
      message: '¿Seguro que quieres salir de la aplicación?',
      buttons: [
        {
          text: 'No',
          role: 'cancel',
          handler: () => {
            this.nav.push(MenuPage);
            this.menuCtrl.close();
          }
        },
        {
          text: 'Si',
          handler: () => {
            console.log("pase por aqui");
            this.storage.remove('nombre').then(() => {

            });
            this.storage.remove('id').then(() => {

            });
            this.nav.push(LoginPage);
            this.menuCtrl.close();
          }
        }
      ]
    });
    alert.present();
  }
}

