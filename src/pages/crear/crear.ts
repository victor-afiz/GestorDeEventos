import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
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

  constructor(public navCtrl: NavController, public navParams: NavParams) {
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

}
