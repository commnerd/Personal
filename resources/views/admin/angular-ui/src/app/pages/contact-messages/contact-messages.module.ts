import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { IndexComponent } from './index/index.component';
import { ContactMessagesComponent } from './contact-messages.component';
import { ContactMessagesRoutingModule } from './contact-messages-routing.module';
import { ContactMessagesService } from '@services/api/contact-messages.service';



@NgModule({
  declarations: [
    ContactMessagesComponent
  ],
  imports: [
    CommonModule,
    ContactMessagesRoutingModule
  ],
  providers: [
    ContactMessagesService
  ]
})
export class ContactMessagesModule { }
