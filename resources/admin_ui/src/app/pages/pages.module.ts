import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PagesRoutingModule } from './pages-routing.module';
import { PagesComponent } from './pages.component';
import { PartialsModule } from '../partials/partials.module';

@NgModule({
  declarations: [PagesComponent],
  imports: [
    CommonModule,
    PartialsModule,
    PagesRoutingModule,
  ],
  exports: [PagesComponent]
})
export class PagesModule { }
