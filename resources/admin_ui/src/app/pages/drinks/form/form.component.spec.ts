import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormComponent } from './form.component';
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";
import {DrinksModule} from "@pages/drinks/drinks.module";
import {DrinkService} from "@services/models/drink.service";
import {HttpClient, HttpHandler} from "@angular/common/http";

describe('FormComponent', () => {
  let component: FormComponent;
  let fixture: ComponentFixture<FormComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [BrowserAnimationsModule, DrinksModule],
      providers: [DrinkService, HttpClient, HttpHandler],
      declarations: [FormComponent]
    });
    fixture = TestBed.createComponent(FormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
