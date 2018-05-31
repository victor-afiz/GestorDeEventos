import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {HttpClient} from '@angular/common/http';
import { ListasPage } from '../listas/listas';
import { DomSanitizer } from '@angular/platform-browser';

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

      this.http.get('http://localhost:8000/getAllEvents/')
          .subscribe(
              res => {
                  if (res){
                      this.all = res;
                      for(let total of this.all){
                          if (total.AdminID == this.navParams.data[1]){
                              this.todo.push(total);
                          }
                      }
                      this.text = this.todo;

                  }
              },
              err => {
                  console.log("Error",err);
              }
          );
  }
    lista()
    {
        this.navCtrl.push(ListasPage);
    }

}


