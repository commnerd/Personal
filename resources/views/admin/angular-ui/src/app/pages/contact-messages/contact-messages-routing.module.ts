import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { ContactMessagesComponent } from './contact-messages.component';


const routes: Routes = [
  {
    path: '',
    component: ContactMessagesComponent,
    children: [
      { path: '', component: IndexComponent  },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ContactMessagesRoutingModule { }