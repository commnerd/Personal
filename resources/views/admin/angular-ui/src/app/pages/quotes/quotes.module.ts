import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatRadioModule } from '@angular/material/radio';
import { MatCardModule } from '@angular/material/card';
import { ReactiveFormsModule } from '@angular/forms';

import { QuotesService } from '@services/api/quotes.service';
import { QuotesRoutingModule } from './quotes-routing.module';
import { QuotesComponent } from './quotes.component';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';




@NgModule({
  declarations: [
    QuotesComponent,
    IndexComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    QuotesRoutingModule,
    MatInputModule,
    MatButtonModule,
    MatSelectModule,
    MatRadioModule,
    MatCardModule,
    ReactiveFormsModule
  ],
  providers: [
    QuotesService
  ]
})
export class QuotesModule { }
