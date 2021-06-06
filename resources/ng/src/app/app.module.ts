import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from '@pages/home/home.component';
import { CoverComponent } from '@pages/cover/cover.component';

import { ApiService } from "./services/api.service";
import { MainNavComponent } from './partials/main-nav/main-nav.component';
import { FooterComponent } from './partials/footer/footer.component';
import { BasePageComponent } from './templates/base-page/base-page.component';

@NgModule({
  declarations: [
    AppComponent,
    MainNavComponent,
    FooterComponent,
    BasePageComponent,
    HomeComponent,
    CoverComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FontAwesomeModule,
    BrowserAnimationsModule,
    HttpClientModule
  ],
  providers: [
    ApiService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
