import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { HttpClient } from '@angular/common/http';
import { HomePage } from '../home/home';
import { MenuPage } from '../menu/menu';
/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {
  myForm: FormGroup;
  constructor(
    public navCtrl: NavController,
    public navParams: NavParams,
    public formBuilder: FormBuilder,
    public http: HttpClient
    ){
      this.myForm = this.createMyForm();
  }
  private createMyForm(){
    return this.formBuilder.group({
      email: ['', Validators.required],
      password: ['', Validators.required]

    });
  }
  ionViewDidLoad() {
    console.log('ionViewDidLoad LoginPage');
  }
  find(){
      this.http.get('http://80.211.5.206/index.php/login/?email='+this.myForm.value.email+'&password='+
          this.myForm.value.password)
          .subscribe(
              res => {
                  console.log(res);
                  if (res){
                    this.navCtrl.push(MenuPage, res)
                  }
              },
              err => {
                  console.log(err);
              }
          );
  }
  send() {
    this.navCtrl.push(HomePage);
  }

}
