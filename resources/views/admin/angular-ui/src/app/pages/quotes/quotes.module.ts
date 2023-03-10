import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { QuotesService } from '@services/api/quotes.service';
import { QuotesRoutingModule } from './quotes-routing.module';
import { QuotesComponent } from './quotes.component';
import { IndexComponent } from './index/index.component';



@NgModule({
  declarations: [
    QuotesComponent,
    IndexComponent
  ],
  imports: [
    CommonModule,
    QuotesRoutingModule
  ],
  providers: [
    QuotesService
  ]
})
export class QuotesModule { }
