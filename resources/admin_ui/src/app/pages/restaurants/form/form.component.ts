import {Component, Input, SimpleChanges} from '@angular/core';
import {FormArray, FormBuilder, FormGroup} from "@angular/forms";
import {Router} from "@angular/router";
import {Restaurant} from "@interfaces/food/restaurant";
import { RestaurantService } from "@services/models/food/restaurant.service";

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.scss']
})
export class FormComponent {
  @Input() rnt!: Restaurant | null;
  restaurantForm!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private packageService: RestaurantService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.restaurantForm = this.formBuilder.group({
      id: [''],
      name: [''],
      orders: this.formBuilder.array([])
    });
  }

  ngOnChanges(changes: SimpleChanges): void {
    if(this.rnt) {
      this.restaurantForm.patchValue({
        id: changes['rnt'].currentValue.id,
        name: changes['rnt'].currentValue.name,
        orders: [],
      });
      let orders = changes['rnt'].currentValue.orders;
      for(let i = 0; i < orders.length; i++) {
        (<FormArray>this.restaurantForm.get('orders')).push(
          this.formBuilder.group(orders[i])
        );
      }
    }
  }

  onSubmit() {
    let subscriber = this.packageService.save(this.restaurantForm.value).subscribe( (rs) => {
      subscriber.unsubscribe();
      this.router.navigate(['restaurants']);
    });
  }

  addOrder() {
    (<FormArray>this.restaurantForm.get('orders')).push(
      this.formBuilder.group({ label: [''], notes: [''] })
    );
  }

  trackFn(i: number) {
    return i;
  }
}
