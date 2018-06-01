import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the ListasPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-listas',
  templateUrl: 'listas.html',
})
export class ListasPage {

    disabled: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    console.log(this.navParams.data);
  }
    protected adjustTextarea(event: any): void {
        let textarea: any = event.target;
        textarea.style.overflow = 'hidden';
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
        return;
    }

  ionViewDidLoad()
  {
      this.isDisabled();
  }

    isDisabled()
    {
        if (this.navParams.data[0].AdminID != this.navParams.data[1]){
            this.disabled = true;
        }else{
            this.disabled = false;
        }
    }
}
