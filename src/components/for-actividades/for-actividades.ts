import { Component } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { NavController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';
import { NavParams } from 'ionic-angular';

@Component({
  selector: 'for-actividades',
  templateUrl: 'for-actividades.html'
})
export class ForActividadesComponent {

  text: string;
  todo : any = [] ;
  all : any = [] ;
  actividades:any[] = []
  constructor(public sanitizer:DomSanitizer,public navCtrl: NavController,public navParams: NavParams,public http: HttpClient) {
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




}

