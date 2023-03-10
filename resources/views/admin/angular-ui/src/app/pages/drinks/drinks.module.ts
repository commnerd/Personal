import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { DrinksComponent } from './drinks.component';
import { DrinksService } from '@services/api/drinks.service';
import { DrinksRoutingModule } from './drinks-routing.module';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatRadioModule } from '@angular/material/radio';
import { MatCardModule } from '@angular/material/card';
import { ReactiveFormsModule } from '@angular/forms';
import { CreateComponent } from './create/create.component';
import { EditComponent } from './edit/edit.component';

@NgModule({
  declarations: [
    DrinksComponent,
    IndexComponent,
    FormComponent,
    CreateComponent,
    EditComponent
  ],
  imports: [
    CommonModule,
    DrinksRoutingModule,
    MatInputModule,
    MatButtonModule,
    MatSelectModule,
    MatRadioModule,
    MatCardModule,
    ReactiveFormsModule
  ],
  providers: [
    DrinksService
  ]
})
export class DrinksModule { }

