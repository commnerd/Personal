import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from "@pages/blog/index/index.component";
import {CreateComponent} from "@pages/blog/create/create.component";
import {EditComponent} from "@pages/blog/edit/edit.component";

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'posts/create', component: CreateComponent },
  { path: 'posts/:id/edit', component: EditComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class BlogRoutingModule { }
