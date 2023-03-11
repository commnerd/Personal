import { Component, Input } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Drink } from '@models/api/drink';
import { DrinksService } from '@services/api/drinks.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input() title: string = '';
  @Input() drink: Drink = { name: '', recipe: '' };

  drinkForm = this.fb.group({
    name: [null, Validators.required],
    recipe: [null, Validators.required],
  });

  constructor(
    private fb: FormBuilder,
    private drinkService: DrinksService,
    private router: Router
  ) {}

  onSubmit(): void {
    if(this.drinkForm.valid) {
      Object.assign(this.drink, this.drinkForm.value);
      let subscription = this.drinkService.save(this.drink).subscribe( drink => {
        this.router.navigate(['']);
        subscription.unsubscribe();
      });
    }
  }
}
