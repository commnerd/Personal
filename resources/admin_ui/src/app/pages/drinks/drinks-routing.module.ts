import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DrinksComponent } from './drinks.component';

const routes: Routes = [
  { path: '', component: DrinksComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  providers: [DrinksComponent],
})
export class DrinksRoutingModule { }
