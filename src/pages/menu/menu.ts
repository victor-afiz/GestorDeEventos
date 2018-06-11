import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

import { UnoPage } from '../uno/uno';
import { CrearPage } from '../crear/crear';

/**
 * Generated class for the MenuPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-menu',
  templateUrl: 'menu.html',
})
export class MenuPage {
  tab1Root = UnoPage;
  tab2Root = CrearPage;
  tabParams: any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.tabParams = navParams.data;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MenuPage');
  }
 
}
