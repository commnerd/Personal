import {Component, Input, SimpleChanges} from '@angular/core';
import {Drink} from "@interfaces/drink";
import {FormBuilder, FormGroup} from "@angular/forms";
import {DrinkService} from "@services/models/drink.service";
import {Router} from "@angular/router";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input() drink!: Drink | null;
  drinkForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private drinkService: DrinkService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.drink = {
      name: '',
      recipe: ''
    };
    this.drinkForm = this.formBuilder.group(this.drink);
  }

  ngOnChanges(changes: SimpleChanges): void
  {
    if(this.drink) {
      this.drinkForm.setValue({
        name: changes['drink']?.currentValue.name,
        recipe: changes['drink']?.currentValue.recipe,
      });
    }
  }

  onSubmit() {
    let subscriber = this.drinkService.save(Object.assign(this.drink!, this.drinkForm.value)).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['drinks']);
    });
  }
}
