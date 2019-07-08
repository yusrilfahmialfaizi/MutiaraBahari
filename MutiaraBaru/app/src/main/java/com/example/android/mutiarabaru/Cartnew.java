package com.example.android.mutiarabaru;

import java.io.Serializable;
import java.math.BigDecimal;
import java.util.HashMap;
import java.util.Map;
import java.util.Set;

public class Cartnew implements Serializable {
	private static final String data_url = "http://192.168.43.70/";

	private Map<Saleable, Integer> cartItemMap = new HashMap<Saleable, Integer>();
	private BigDecimal totalPrice = BigDecimal.ZERO;
	private int totalQuantity = 0;

	/**
	 * Add a quantity of a certain {@link Saleable} product to this shopping modelProducts
	 *
	 * @param saleable the product will be added to this shopping modelProducts
	 * @param quantity the amount to be added
	 */
	public void add(final Saleable saleable, int quantity) {
		if (cartItemMap.containsKey(saleable)) {
			cartItemMap.put(saleable, cartItemMap.get(saleable) + quantity);
		} else {
			cartItemMap.put(saleable, quantity);
		}

		totalPrice = totalPrice.add(saleable.getPrice().multiply(BigDecimal.valueOf(quantity)));
		totalQuantity += quantity;
	}

	/**
	 * Set new quantity for a {@link Saleable} product in this shopping modelProducts
	 *
	 * @param sellable the product which quantity will be updated
	 * @param quantity the new quantity will be assigned for the product
	 * @throws ProductNotFoundException    if the product is not found in this shopping modelProducts.
	 * @throws QuantityOutOfRangeException if the quantity is negative
	 */
	public void update(final Saleable sellable, int quantity) throws ProductNotFoundException, QuantityOutOfRangeException {
		if (!cartItemMap.containsKey(sellable)) throw new ProductNotFoundException();
		if (quantity < 0)
			throw new QuantityOutOfRangeException(quantity + " is not a valid quantity. It must be non-negative.");

		int productQuantity = cartItemMap.get(sellable);
		BigDecimal productPrice = sellable.getPrice().multiply(BigDecimal.valueOf(productQuantity));

		cartItemMap.put(sellable, quantity);

		totalQuantity = totalQuantity - productQuantity + quantity;
		totalPrice = totalPrice.subtract(productPrice).add(sellable.getPrice()
				.multiply(BigDecimal.valueOf(quantity)));
	}

	/**
	 * Remove a certain quantity of a {@link Saleable} product from this shopping modelProducts
	 *
	 * @param saleable the product which will be removed
	 * @param quantity the quantity of product which will be removed
	 * @throws ProductNotFoundException    if the product is not found in this shopping modelProducts
	 * @throws QuantityOutOfRangeException if the quantity is negative or more than the existing quantity of the product in this shopping modelProducts
	 */
	public void remove(final Saleable saleable, int quantity)
			throws ProductNotFoundException, QuantityOutOfRangeException {
		if (!cartItemMap.containsKey(saleable)) throw new ProductNotFoundException();

		int productQuantity = cartItemMap.get(saleable);

		if (quantity < 0 || quantity > productQuantity)
			throw new QuantityOutOfRangeException(quantity + " is not a valid quantity. It must be non-negative and less than the current quantity of the product in the shopping modelProducts.");

		if (productQuantity == quantity) {
			cartItemMap.remove(saleable);
		} else {
			cartItemMap.put(saleable, productQuantity - quantity);
		}

		totalPrice = totalPrice.subtract(saleable.getPrice().multiply(BigDecimal.valueOf(quantity)));
		totalQuantity -= quantity;
	}

	/**
	 * Remove a {@link Saleable} product from this shopping modelProducts totally
	 *
	 * @param saleable the product to be removed
	 * @throws ProductNotFoundException if the product is not found in this shopping modelProducts
	 */
	public void remove(final Saleable saleable) throws ProductNotFoundException {
		if (!cartItemMap.containsKey(saleable)) throw new ProductNotFoundException();

		int quantity = cartItemMap.get(saleable);
		cartItemMap.remove(saleable);
		totalPrice = totalPrice.subtract(saleable.getPrice().multiply(BigDecimal.valueOf(quantity)));
		totalQuantity -= quantity;
	}

	/**
	 * Remove all products from this shopping modelProducts
	 */
	public void clear() {
		cartItemMap.clear();
		totalPrice = BigDecimal.ZERO;
		totalQuantity = 0;
	}

	/**
	 * Get quantity of a {@link Saleable} product in this shopping modelProducts
	 *
	 * @param saleable the product of interest which this method will return the quantity
	 * @return The product quantity in this shopping modelProducts
	 * @throws ProductNotFoundException if the product is not found in this shopping modelProducts
	 */
	public int getQuantity(final Saleable saleable) throws ProductNotFoundException {
		if (!cartItemMap.containsKey(saleable)) throw new ProductNotFoundException();
		return cartItemMap.get(saleable);
	}

	/**
	 * Get total cost of a {@link Saleable} product in this shopping modelProducts
	 *
	 * @param saleable the product of interest which this method will return the total cost
	 * @return Total cost of the product
	 * @throws ProductNotFoundException if the product is not found in this shopping modelProducts
	 */
	public BigDecimal getCost(final Saleable saleable) throws ProductNotFoundException {
		if (!cartItemMap.containsKey(saleable)) throw new ProductNotFoundException();
		return saleable.getPrice().multiply(BigDecimal.valueOf(cartItemMap.get(saleable)));
	}

	/**
	 * Get total price of all products in this shopping modelProducts
	 *
	 * @return Total price of all products in this shopping modelProducts
	 */
	public BigDecimal getTotalPrice() {
		return totalPrice;
	}

	/**
	 * Get total quantity of all products in this shopping modelProducts
	 *
	 * @return Total quantity of all products in this shopping modelProducts
	 */
	public int getTotalQuantity() {
		return totalQuantity;
	}

	/**
	 * Get set of products in this shopping modelProducts
	 *
	 * @return Set of {@link Saleable} products in this shopping modelProducts
	 */
	public Set<Saleable> getProducts() {
		return cartItemMap.keySet();
	}

	/**
	 * Get a map of products to their quantities in the shopping modelProducts
	 *
	 * @return A map from product to its quantity in this shopping modelProducts
	 */
	public Map<Saleable, Integer> getItemWithQuantity() {
		Map<Saleable, Integer> cartItemMap = new HashMap<Saleable, Integer>();
		cartItemMap.putAll(this.cartItemMap);
		return cartItemMap;
	}

	@Override
	public String toString() {
		StringBuilder strBuilder = new StringBuilder();
		for (Map.Entry<Saleable, Integer> entry : cartItemMap.entrySet()) {
			strBuilder.append(String.format("Product: %s, Unit Price: %f, Quantity: %d%n",
					entry.getKey().getName(), entry.getKey().getPrice(), entry.getValue()));
		}
		strBuilder.append(String.format("Total Quantity: %d, Total Price: %f",
				totalQuantity, totalPrice));
		return strBuilder.toString();
	}
}
