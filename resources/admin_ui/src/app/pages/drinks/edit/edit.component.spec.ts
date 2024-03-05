import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditComponent } from './edit.component';
import {RouterTestingModule} from "@angular/router/testing";
import {HttpClient, HttpHandler} from "@angular/common/http";
import {FormComponent} from "@pages/quotes/form/form.component";
import {DrinksModule} from "@pages/drinks/drinks.module";
import {DrinkService} from "@services/models/drink.service";

describe('EditComponent', () => {
  let component: EditComponent;
  let fixture: ComponentFixture<EditComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [DrinksModule, RouterTestingModule],
      providers: [DrinkService, HttpClient, HttpHandler],
      declarations: [EditComponent, FormComponent]
    });
    fixture = TestBed.createComponent(EditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
