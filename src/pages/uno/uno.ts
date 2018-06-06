import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {HttpClient} from '@angular/common/http';
import { ListasPage } from '../listas/listas';
import { DomSanitizer } from '@angular/platform-browser';
import { ListasPageUserPage } from '../listas-page-user/listas-page-user';

/**
 * Generated class for the UnoPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-uno',
  templateUrl: 'uno.html',
})
export class UnoPage {
  res: any;
  text: string;
  todo : any = [] ;
  all : any = [] ;

  constructor(public sanitizer:DomSanitizer, public navCtrl: NavController, public navParams: NavParams,public http: HttpClient)
  {
    console.log(this.res = navParams.data[1]);
  }


  ionViewWillEnter()
  {  
    this.todo = [];
      this.http.get('http://80.211.5.206/index.php/getAllEvents/?id='+this.res)
          .subscribe(
              res => {
                  this.all = res;
              },
              err => {
                  this.all = [];
                  console.log("Error",err);
              }
          );
  }
    lista(object)
    {
        let array =[
            object,
            this.res
        ];
        if (array[0].AdminID == this.res){
            this.navCtrl.push(ListasPage,array);
        }else{
            this.navCtrl.push(ListasPageUserPage,array);
        }
    }

}


