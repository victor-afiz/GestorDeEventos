import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { HttpClientModule } from '@angular/common/http';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { LoginPage } from '../pages/login/login';
import { MenuPage } from '../pages/menu/menu';
import { TabsPage } from '../pages/tabs/tabs';
import { UnoPage } from '../pages/uno/uno';
import { CrearPage } from '../pages/crear/crear';
import { SalirPage } from '../pages/salir/salir';
import { AboutPage } from '../pages/about/about';
import { PrivacyPolicyPage } from '../pages/privacy-policy/privacy-policy';
import { VersionPage } from '../pages/version/version';
import { ListasPage } from '../pages/listas/listas';
import { ListasPageUserPage } from '../pages/listas-page-user/listas-page-user';
import { ImagenesPage } from '../pages/imagenes/imagenes';
import { UsersPage } from '../pages/users/users';
import {ForActividadesComponent} from '../components/for-actividades/for-actividades';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    LoginPage,
    MenuPage,
    TabsPage,
    UnoPage,
    CrearPage,
    SalirPage,
    AboutPage,
    PrivacyPolicyPage,
    VersionPage,
    ForActividadesComponent,
      ListasPage,
      ImagenesPage,
      UsersPage,
      ListasPageUserPage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp, {
			platforms: {
				ios: {
					backButtonText: ''
				}
			}
		}),
    HttpClientModule
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    LoginPage,
    MenuPage,
    TabsPage,
    UnoPage,
    CrearPage,
    SalirPage,
    AboutPage,
    PrivacyPolicyPage,
    VersionPage,
    ForActividadesComponent,
      ListasPage,
      ImagenesPage,
      UsersPage,
      ListasPageUserPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
