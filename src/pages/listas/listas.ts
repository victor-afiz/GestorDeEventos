import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';
import { HttpClient } from '@angular/common/http';

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
todo : any = [];
all : any = [];
message : string;
text : string;
mensaje : string;
eventoID : string;
Message : string;

  constructor(public navCtrl: NavController, public navParams: NavParams, public http: HttpClient,private alertCtrl: AlertController) {
    
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
        this.cargaDatos();
  }

  cargaDatos()
  {
    this.Message = this.navParams.data[0].Message;
    this.todo = [];
      this.http.get('http://80.211.5.206/index.php/getAllMembers/?id='+this.navParams.data[0].ID)
          .subscribe(
              res => {
                    this.todo =res;
                    console.log(this.todo);
                    for (let x = 0; x<this.todo.length; x++ ){
                      if (this.todo[x].idUsuario === this.navParams.data[1]){
                        this.all = this.todo[x];
                        this.eventoID = this.all.idEvento;
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
    this.http.get('http://80.211.5.206/index.php/setEventMessage/?idEvent='+this.eventoID+'&message='+this.Message)
    .subscribe(
        res => {
                         
        },
        err => {
            console.log("Error",err);
        }
    ); 
  }

  edita(objeto)
  {
      console.log(objeto);
    this.http.get('http://80.211.5.206/index.php/setMemberMessage/?idUser='+objeto.idUsuario+'&idEvent='+objeto.idEvento+'&message='+objeto.mensaje)
    .subscribe(
        res => {
                          
        },
        err => {
            console.log("Error",err);
        }
    ); 

  }

  elimina(objeto)
  {
    let alert = this.alertCtrl.create({
        title: 'Confirmar delete',
        message: '¿Seguro que quieres eliminar este usuario?',
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
                this.http.get('http://80.211.5.206/index.php/deleteMember/?idUser='+objeto.idUsuario+'&idEvent='+objeto.idEvento)
                .subscribe(
                    res => {
                        this.cargaDatos();
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
  
  delete()
  {
    let alert = this.alertCtrl.create({
        title: 'Confirmar delete',
        message: '¿Seguro que quieres eliminar este evento?',
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
                this.http.get('http://80.211.5.206/index.php/deleteEvent/?idEvent='+this.eventoID)
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
