import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndexComponent } from './index/index.component';

const routes: Routes = [
  { path: '', component: IndexComponent },
  { path: 'blog', loadChildren: () => import('./blog/blog.module').then(m => m.BlogModule) },
  { path: 'composer', loadChildren: () => import('./composer/composer.module').then(m => m.ComposerModule) },
  { path: 'drinks', loadChildren: () => import('./drinks/drinks.module').then(m => m.DrinksModule) },
  { path: 'messages', loadChildren: () => import('./messages/messages.module').then(m => m.MessagesModule) },
  { path: 'quotes', loadChildren: () => import('./quotes/quotes.module').then(m => m.QuotesModule) },
  { path: 'reminders', loadChildren: () => import('./reminders/reminders.module').then(m => m.RemindersModule) },
  { path: 'restaurants', loadChildren: () => import('./restaurants/restaurants.module').then(m => m.RestaurantsModule) },
  { path: 'resume', loadChildren: () => import('./resume/resume.module').then(m => m.ResumeModule) },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class PagesRoutingModule { }
