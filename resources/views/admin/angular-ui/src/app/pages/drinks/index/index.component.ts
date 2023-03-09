import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Paginated } from '@models/api/laravel/paginated';
import { Drink } from '@models/api/drink';
import { DrinksService } from '@services/api/drinks.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.scss']
})
export class IndexComponent implements OnInit {

  drinks$: Observable<Paginated<Drink>> = this.drinksService.list();

  constructor(
    private drinksService: DrinksService
  ) { }

  ngOnInit(): void {
  }

}
