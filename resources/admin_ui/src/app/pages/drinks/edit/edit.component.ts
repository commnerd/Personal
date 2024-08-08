import { Component } from '@angular/core';
import { first, Observable } from "rxjs";
import { DrinkService } from "@services/models/drink.service";
import { ActivatedRoute } from "@angular/router";
import { Drink } from "@interfaces/drink";

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.scss']
})
export class EditComponent {
  drink$!: Observable<Drink | null>;

  constructor(
    private drinkService: DrinkService,
    private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {
    this.route.params.pipe(first()).subscribe(params => {
      this.drink$ = this.drinkService.get(params['id'] as number);
    });
  }
}
