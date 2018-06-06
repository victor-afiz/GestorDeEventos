import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';

/**
 * Generated class for the ListasPageUserPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-listas-page-user',
  templateUrl: 'listas-page-user.html',
})
export class ListasPageUserPage {

todo : any = [];
disabled: boolean = true;
all : any = [];
message : string;
nombre : string;
mensaje : string;
  constructor(public navCtrl: NavController, public navParams: NavParams,public http: HttpClient, private alertCtrl: AlertController) {
  }

  ionViewDidLoad() {
      this.http.get('http://80.211.5.206/index.php/getAllMembers/?id='+this.navParams.data[0].ID)
          .subscribe(
              res => {
                    this.todo = res;
                    console.log(this.todo);
                    for (let x = 0; x<this.todo.length; x++ ){
                      if (this.todo[x].idUsuario === this.navParams.data[1]){
                        this.all = this.todo[x];
                        this.message = this.all.mensaje;
                        this.nombre = this.all.nombreParticipante;
                        let index = this.todo.indexOf(this.todo[x], 0);
                          if (index > -1) {
                          this.todo.splice(index, 1);
                      }
                    }
                    }                 
              },
              err => {
                  console.log("Error",err);
              }
          );         
  }
  inserta()
  {
    this.http.get('http://80.211.5.206/index.php/setMemberMessage/?idUser='+this.all.idUsuario+'&idEvent='+this.all.idEvento+'&message='+this.message)
          .subscribe(
              res => {
                                 
              },
              err => {
                  console.log("Error",err);
              }
          ); 
  }

  elimina()
  {
    let alert = this.alertCtrl.create({
      title: 'Confirmar delete',
      message: '¿Seguro que quieres salir del evento?',
      buttons: [
        {
          text: 'No',
          role: 'No',
          handler: () => {
          }
        },
        {
          text: 'Si',
          handler: () => {
              this.http.get('http://80.211.5.206/index.php/deleteMember/?idUser='+this.all.idUsuario+'&idEvent='+this.all.idEvento)
              .subscribe(
                  res => {
                      this.navCtrl.pop();
                  },
                  err => {
                      console.log("Error",err);
                  }
              ); 
          }
        }
      ]
    });
    alert.present();
  }
}
