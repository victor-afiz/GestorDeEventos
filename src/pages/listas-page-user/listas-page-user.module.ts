import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ListasPageUserPage } from './listas-page-user';

@NgModule({
  declarations: [
    ListasPageUserPage,
  ],
  imports: [
    IonicPageModule.forChild(ListasPageUserPage),
  ],
})
export class ListasPageUserPageModule {}
