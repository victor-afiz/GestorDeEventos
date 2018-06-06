import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
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
  myColor :string;
  array : any = [];
  constructor(public navCtrl: NavController, public navParams: NavParams,public http: HttpClient) {
  }

  ionViewDidLoad() {
    
    this.http.get('http://80.211.5.206/index.php/User/?id=' +this.navParams.data).subscribe(
      res => {
        if (res) {
          this.all = res;    
        }
      },
      err => {
        console.log("Error", err);
      }
    );
  }
  pintar(id)
  {
    this.array.push(id);
    this.navCtrl.getPrevious().data.array = this.array;
  }

}
