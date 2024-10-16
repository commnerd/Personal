import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from "./index/index.component";
import { CreateComponent } from "@pages/restaurants/create/create.component";
import { EditComponent } from "@pages/restaurants/edit/edit.component";

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'create', component: CreateComponent },
  { path: ':id/edit', component: EditComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RestaurantsRoutingModule { }
