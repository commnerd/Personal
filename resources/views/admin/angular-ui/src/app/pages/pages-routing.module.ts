import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { PagesComponent } from './pages.component';


const routes: Routes = [
  {
    path: '',
    component: PagesComponent,
    children: [
      { path: '', component: IndexComponent  },
      { path: 'contact-messages', loadChildren: () => import('./contact-messages/contact-messages.module').then(m => m.ContactMessagesModule) },
      { path: 'drinks', loadChildren: () => import('./drinks/drinks.module').then(m => m.DrinksModule) },
      { path: 'quotes', loadChildren: () => import('./quotes/quotes.module').then(m => m.QuotesModule) },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PagesRoutingModule { }
