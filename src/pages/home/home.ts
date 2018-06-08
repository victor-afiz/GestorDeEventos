import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { AlertController } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
    selector: 'page-home',
    templateUrl: 'home.html'

})

export class HomePage {

    myForm: FormGroup;
    constructor(
        public navCtrl: NavController,
        public formBuilder: FormBuilder,
        private alertCtrl: AlertController
        , public http: HttpClient
    ) {
        this.myForm = this.createMyForm();
    }

    private createMyForm() {
        return this.formBuilder.group({
            name: ['', Validators.required],
            nickName: ['', Validators.required],
            email: ['', Validators.required],
            passwordRetry: this.formBuilder.group({
                password: ['', Validators.required],
                passwordConfirmation: ['', Validators.required]
            })
        });
    }
  presentConfirm() {

  }
    saveData() {

        if (this.myForm.value.passwordRetry.password === this.myForm.value.passwordRetry.passwordConfirmation){

            this.http.get('http://80.211.5.206/index.php/usuario/?name='+
                this.myForm.value.name+'&nickName='+
                this.myForm.value.nickName+'&email='+
                this.myForm.value.email+'&password='+
                this.myForm.value.passwordRetry.password)
                .subscribe(
                    res => {

                        if(res[0] === 'existe'){
                          let alert = this.alertCtrl.create({
                            title: 'Correo en uso',
                            subTitle: 'Intentelo con otro',
                            buttons: ['Ok']
                          });
                          alert.present();
                          
                        }else if(res[0] === 'NickName introducido ya esta en uso') {

                            let alert = this.alertCtrl.create({
                                title: 'Nickname en uso',
                                subTitle: 'Intentelo con otro',
                                buttons: ['Ok']
                              });
                              alert.present();

                        }else if (res[0] == 'nuevo'){
                            this.navCtrl.push(LoginPage,res);
                        }
                    },
                    err => {
                        console.log(err);
                      let alert = this.alertCtrl.create({
                        title: 'Server error',
                        subTitle: 'Intentelo mas tarde',
                        buttons: ['Retry']
                      });
                      alert.present();
                    }

                );
        } else {
            let alert = this.alertCtrl.create({
                title: 'Wrong password',
                subTitle: 'Please retry the login and try again',
                buttons: ['Retry']
            });
            alert.present();
        }
    }
    send()
    {
        this.navCtrl.push(LoginPage);
    }
}
