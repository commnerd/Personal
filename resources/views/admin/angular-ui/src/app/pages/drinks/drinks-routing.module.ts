import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { DrinksComponent } from './drinks.component';


const routes: Routes = [
  {
    path: '',
    component: DrinksComponent,
    children: [
      { path: '', component: IndexComponent  },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class DrinksRoutingModule { }