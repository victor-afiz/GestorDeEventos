import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import {HttpClient} from '@angular/common/http';
/**
 * Generated class for the UsersPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-users',
  templateUrl: 'users.html',
})
export class UsersPage {
  all : any = [] ;
  myColor :object;
  array : any = [];
  id : any;

  constructor(public navCtrl: NavController, public navParams: NavParams,public http: HttpClient, private alertCtrl: AlertController) {
    this.myColor = {'background-color': "#ff9900"};
  }

  ionViewDidLoad() {
    
    this.http.get('http://80.211.5.206/index.php/User/?id=' +this.navParams.data).subscribe(
      res => {
        if (res) {
          this.all = res;  
          this.all = this.all.map(function(x) {
            x.pintado = true;
            return x;
         });
        }
      },
      err => {
        console.log("Error", err);
      }
    );
  }
  pintar(objeto)
  {
    if(objeto.pintado){
      objeto.pintado = false;
      this.array.push(objeto.id);
      this.navCtrl.getPrevious().data.array = this.array;
    }else {
      objeto.pintado = true;
      
      this.array = this.array.filter(function (e) {
        return e != objeto.id;
    });
      this.navCtrl.getPrevious().data.array = this.array;
    }
    console.log(this.array);

    
  }

}
