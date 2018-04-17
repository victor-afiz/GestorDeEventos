import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { LoginPage } from '../login/login';
import { AlertController } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { MenuPage } from '../menu/menu';
import { HttpClient } from '@angular/common/http';

import { HttpClient,HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})

export class HomePage {
  myForm: FormGroup;

  constructor(
    public navCtrl: NavController,
    public formBuilder: FormBuilder,
<<<<<<< HEAD
    private alertCtrl: AlertController,
    public http: HttpClient
=======
    private alertCtrl: AlertController
    , public http: HttpClient
>>>>>>> dad9b0f8b736d9a1b79a0238517138d6959adca2
  ) {
    this.myForm = this.createMyForm();
  }

  private createMyForm() {
    return this.formBuilder.group({
      name: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', Validators.required],
      passwordRetry: this.formBuilder.group({
        password: ['', Validators.required],
        passwordConfirmation: ['', Validators.required]
      })
    });
  }
  saveData() {
    if (this.myForm.value.passwordRetry.password === this.myForm.value.passwordRetry.passwordConfirmation) {
      this.navCtrl.push(MenuPage);
<<<<<<< HEAD
=======

      this.http.get('http://localhost:8000/usuario/?name='+
        this.myForm.value.name+'&lastName='+
        this.myForm.value.lastName+'&email='+
        this.myForm.value.lastName+'&password='+
        this.myForm.value.passwordRetry.password)
        .subscribe(
          res => {
            console.log(res);
          },
          err => {
            console.log(err);
          }
        );
        console.log(this.http.get('localhost:8000/usuario/'+
        'name:'+this.myForm.value.name+
        'lastName:'+this.myForm.value.lastName+
        'email:'+this.myForm.value.email+
        'password:'+this.myForm.value.passwordRetry.password

      ));
>>>>>>> dad9b0f8b736d9a1b79a0238517138d6959adca2
    } else {
      let alert = this.alertCtrl.create({
        title: 'Wrong password',
        subTitle: 'Please retry the login and try again',
        buttons: ['Retry']
      });
      alert.present();
    }

  }
  send() {
    this.navCtrl.push(LoginPage);
  }

  name() {
    
        return this.http.get('http://localhost:8000/save/'+ this.myForm.value.name, {headers: headers}).subscribe(data => {
          console.log(data);
        });
  }

}
