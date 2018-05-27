import { Component,ViewChild } from '@angular/core';
import { Platform } from 'ionic-angular';
import { NavController } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { MenuController } from 'ionic-angular';
import { AlertController } from 'ionic-angular';

import { PrivacyPolicyPage } from '../pages/privacy-policy/privacy-policy';
import { VersionPage } from '../pages/version/version';
import { AboutPage } from '../pages/about/about';
import { MenuPage } from '../pages/menu/menu';
import { LoginPage } from '../pages/login/login';

@Component({
  templateUrl: 'app.html'

})
export class MyApp {
  @ViewChild('mycontent') nav: NavController
  rootPage:any = LoginPage;

  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen, public menuCtrl: MenuController, public alertCtrl: AlertController) {
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
            this.nav.push(HomePage);
            this.menuCtrl.close();
          }
        }
      ]
    });
    alert.present();
  }
}

