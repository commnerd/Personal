import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RestaurantsComponent } from './restaurants.component';

const routes: Routes = [
  { path: '', component: RestaurantsComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  providers: [RestaurantsComponent],
})
export class RestaurantsRoutingModule { }
