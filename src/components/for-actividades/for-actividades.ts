import { Component } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { NavController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'for-actividades',
  templateUrl: 'for-actividades.html'
})
export class ForActividadesComponent {

  text: string;
  todo : any = [] ;
  all : any = [] ;
  actividades:any[] = [
   
  ]
  constructor(public sanitizer:DomSanitizer,public navCtrl: NavController,public http: HttpClient) {
    this.http.get('http://localhost:8000/GetAllEvents/')
        .subscribe(
            res => {
                console.log(res);
                if (res){
                  this.all = res;
                  for(let total of this.all){
                    this.todo.push(total);
                  console.log(total.Name);
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

