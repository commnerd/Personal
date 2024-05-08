import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from "@pages/resume/index/index.component";
import { CreateComponent } from "@pages/resume/create/create.component";
import { EditComponent } from "@pages/resume/edit/edit.component";

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'create', component: CreateComponent },
  { path: ':id/edit', component: EditComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ResumeRoutingModule { }
