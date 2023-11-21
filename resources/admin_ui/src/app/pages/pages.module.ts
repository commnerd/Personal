import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PagesRoutingModule } from './pages-routing.module';
import { PagesComponent } from './pages.component';
import { PartialsModule } from '../partials/partials.module';
import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { AuthInterceptorInterceptor } from '../services/auth-interceptor.interceptor';
import { CKEditorModule } from '@ckeditor/ckeditor5-angular';

@NgModule({
  declarations: [
    PagesComponent
  ],
  providers: [
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptorInterceptor, multi:true },
  ],
  imports: [
    CommonModule,
    PartialsModule,
    PagesRoutingModule,
    CKEditorModule
  ],
  exports: [
    PagesComponent
  ]
})
export class PagesModule { }
