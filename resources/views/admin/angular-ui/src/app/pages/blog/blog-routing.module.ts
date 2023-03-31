import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { IndexComponent } from './index/index.component';
import { BlogComponent } from './blog.component';
import { CreateComponent } from './create/create.component';


const routes: Routes = [
  {
    path: '',
    component: BlogComponent,
    children: [
      { path: '', component: IndexComponent  },
      { path: 'create', component: CreateComponent  },
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BlogRoutingModule { }