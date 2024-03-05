import { Component } from '@angular/core';
import { Observable } from "rxjs";
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
    let paramSubscriber = this.route.params.subscribe(params => {
      this.drink$ = this.drinkService.get(params['id'] as number);
      setTimeout(() => paramSubscriber.unsubscribe(), 0);
    });
  }
}
