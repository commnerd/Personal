import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ResumeComponent } from './resume.component';

const routes: Routes = [
  { path: '', component: ResumeComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
  providers: [ResumeComponent],
})
export class ResumeRoutingModule { }
