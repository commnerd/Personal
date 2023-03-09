import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { QuotesComponent } from './quotes.component';


const routes: Routes = [
  {
    path: '',
    component: QuotesComponent,
    children: [
      { path: '', component: IndexComponent  },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class QuotesRoutingModule { }