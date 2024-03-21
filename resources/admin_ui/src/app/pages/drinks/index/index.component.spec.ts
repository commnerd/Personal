import { ComponentFixture, TestBed } from '@angular/core/testing';
import {MatDialog, MatDialogModule, MatDialogRef} from "@angular/material/dialog";

import { IndexComponent } from './index.component';
import { DrinkService } from '@services/models/drink.service';
import { DrinksModule } from "@pages/drinks/drinks.module";
import { of } from "rxjs";
import { TestDataPaginator } from "../../../../testing/TestDataPaginator";
import { ActivatedRoute } from '@angular/router';
import { RouterTestingModule } from '@angular/router/testing';
import { HttpClientTestingModule } from "@angular/common/http/testing";

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let dialog: MatDialog;
  let drinkService: DrinkService;
  let activatedRoute: ActivatedRoute;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [RouterTestingModule, HttpClientTestingModule, DrinksModule],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    component = fixture.componentInstance;
    dialog = TestBed.inject(MatDialog);
    drinkService = TestBed.inject(DrinkService);
    activatedRoute = TestBed.inject(ActivatedRoute);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should print "No drinks found." on empty paged response', () => {
    drinkService.list = () => of((new TestDataPaginator([])).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(fixture.nativeElement.querySelector('table').textContent).toEqual("No drinks found.");
  });

  it('should print the drink information as passed in', () => {
    let data = [{
      id: 1,
      name: "A drink",
      recipe: "Some recipe",
    }, {
      id: 2,
      name: "Another drink",
      recipe: "Some other recipe",
    }];
    drinkService.list = () => of((new TestDataPaginator(data)).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    expect(content).toContain("A drink");
    expect(content).toContain("Another drink");
  });

  it('delete on confirmation', () => {
    let data = [{
      id: 1,
      name: "A drink",
      recipe: "Some recipe",
    }];
    drinkService.list = () => of((new TestDataPaginator(data)).get());
    const drinkServiceSpy = spyOn(drinkService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A drink");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(true)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(drinkServiceSpy).toHaveBeenCalledTimes(1);
  });

  it('avoid delete on negating confirmation', () => {
    let data = [{
      id: 1,
      name: "A drink",
      recipe: "Some recipe",
    }];
    drinkService.list = () => of((new TestDataPaginator(data)).get());
    const drinkServiceSpy = spyOn(drinkService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A drink");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(false)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(drinkServiceSpy).toHaveBeenCalledTimes(0);
  });

  it('should default to pulling first page', () => {
    activatedRoute.queryParams = of({});
    const drinkServiceSpy = spyOn(drinkService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(drinkServiceSpy).toHaveBeenCalledOnceWith(1);
  });

  it('should pull page corresponding to passed page param', () => {
    activatedRoute.queryParams = of({page: 2});
    const drinkServiceSpy = spyOn(drinkService, 'list');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(drinkServiceSpy).toHaveBeenCalledOnceWith(2);
  });
});
