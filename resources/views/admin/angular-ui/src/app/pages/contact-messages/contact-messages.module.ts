import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ContactMessagesComponent } from './contact-messages.component';
import { ContactMessagesRoutingModule } from './contact-messages-routing.module';
import { ContactMessagesService } from '@services/api/contact-messages.service';
import { IndexComponent } from './index/index.component';



@NgModule({
  declarations: [
    ContactMessagesComponent,
    IndexComponent
  ],
  imports: [
    CommonModule,
    ContactMessagesRoutingModule,
  ],
  providers: [
    ContactMessagesService,
  ]
})
export class ContactMessagesModule { }
