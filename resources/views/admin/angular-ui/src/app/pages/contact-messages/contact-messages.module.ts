import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ContactMessagesComponent } from './contact-messages.component';
import { ContactMessagesRoutingModule } from './contact-messages-routing.module';
import { ContactMessagesService } from '@services/api/contact-messages.service';
import { IndexComponent } from './index/index.component';
import { FormComponent } from './form/form.component';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatRadioModule } from '@angular/material/radio';
import { MatCardModule } from '@angular/material/card';
import { ReactiveFormsModule } from '@angular/forms';



@NgModule({
  declarations: [
    ContactMessagesComponent,
    IndexComponent,
    FormComponent
  ],
  imports: [
    CommonModule,
    ContactMessagesRoutingModule,
    MatInputModule,
    MatButtonModule,
    MatSelectModule,
    MatRadioModule,
    MatCardModule,
    ReactiveFormsModule,
  ],
  providers: [
    ContactMessagesService,
  ]
})
export class ContactMessagesModule { }
