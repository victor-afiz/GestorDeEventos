import { Component,ViewChild } from '@angular/core';
import { Platform } from 'ionic-angular';
import { NavController, NavParams  } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { AboutPage } from '../pages/about/about';
import { MenuController } from 'ionic-angular';


//import { HomePage } from '../pages/home/home';
import { MenuPage } from '../pages/menu/menu';
@Component({
  templateUrl: 'app.html'

})
export class MyApp {
  @ViewChild('mycontent') nav: NavController
  rootPage:any = MenuPage;

  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen, public menuCtrl: MenuController) {
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

}

