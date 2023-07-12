import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from './index/index.component';
import { PagesRoutingModule } from './pages-routing.module';
import { PartialsModule } from '../partials/partials.module';

@NgModule({
  declarations: [
    IndexComponent
  ],
  imports: [
    CommonModule,
    PagesRoutingModule,
    PartialsModule
  ]
})
export class PagesModule { }
